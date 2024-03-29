# multistage support
set :stages, %w(staging production)
set :default_stage, "staging"
require "capistrano/ext/multistage"

set :application, "Sarnia Gives"

# repository info
set :repository,  "git@github.com:CCI-Studios/Sarnia-Gives.git"
set :scm, :git

# ssh settings
set :user, "sgives"
set :use_sudo, false

# Joomla
set :joomla_url, "http://joomlacode.org/gf/download/frsrelease/16914/73508/Joomla_2.5.4-Stable-Full_Package.zip"
set :nooku_url, "http://svn2.assembla.com/svn/nooku-framework/tags/12.1/code"
set :symlinker_url, "https://github.com/jbennett/symlinker/raw/master/link.php"

namespace :deploy do

  namespace :joomla do
    task :setup do
      download
      deploy
      install_default
      symlink
      cleanup
    end

    task :download do
      run <<-cmd
        cd #{public} &&
        wget -q #{joomla_url} -O joomla.zip &&
        unzip -qo joomla.zip
      cmd
    end

    task :deploy do
      require 'erb'
      require 'digest/sha1'

      # get db info
      db_name = Capistrano::CLI.ui.ask("Enter MySQL database name: ")
      db_user = Capistrano::CLI.ui.ask("Enter MySQL database user: ")
      db_pass = Capistrano::CLI.ui.ask("Enter MySQL database password: ")
      db_prefix = ('a'..'z').to_a.shuffle[0..4].join
      site_name = Capistrano::CLI.ui.ask("Enter Site name: ")
      admin_pass = Capistrano::CLI.ui.ask("Enter Admin password: ")

      # create config.php
      secret_hash = Digest::SHA1.hexdigest(Time.now.to_s)[0..15]
      template = ERB.new(File.read('config/templates/config.php.erb'), nil, '<>')
      result = template.result(binding)
      put result, "#{deploy_to}/shared/config.php"

      # install DB and create default admin
      template = ERB.new(File.read('config/templates/joomla.sql.erb'), nil, '<>')
      structure = template.result(binding)

      t = <<-sql
        INSERT INTO #{db_prefix}_users VALUES (42, 'Administrator', 'admin', 'dummy@example.com', concat(md5(concat('#{admin_pass}', '1234')), ':1234'), 'depreciated', 0, 1, '0000-00-00', '0000-00-00', '', '');
        INSERT INTO #{db_prefix}_user_usergroup_map VALUES(42, 8);
      sql
      put "#{structure}#{t}\n", "#{deploy_to}/shared/joomla.sql"
      run "mysql -u#{db_user} -p\"#{db_pass}\" -hlocalhost #{db_name} < #{deploy_to}/shared/joomla.sql"
    end

    task :symlink do
      run "ln -nfs #{deploy_to}/shared/config.php #{public}/configuration.php"
      run "ln -nfs #{current_path}/public/.htaccess #{public}/.htaccess"
    end

    task :install_default do
      nooku::setup
      # install sh404sef
      # install jce
      # install akeeba
    end

    task :cleanup do
      run "rm -rf #{public}/installation"
      run "rm #{public}/joomla.zip"
      run "rm #{public}/htaccess.txt"
      run "rm #{deploy_to}/shared/joomla.sql"
    end
  end

  namespace :nooku do
    task :setup do
      run <<-cmd
        mkdir -p #{deploy_to}/shared;
        cd #{deploy_to}/shared;
        svn checkout -q #{nooku_url} nooku;
        ./symlinker #{deploy_to}/shared/nooku #{public};

        mkdir -p #{public}/plugins/system/koowa;
        mv #{public}/plugins/system/koowa.php #{public}/plugins/system/koowa/koowa.php;
        mv #{public}/plugins/system/koowa.xml #{public}/plugins/system/koowa/koowa.xml;
      cmd
    end

    task :update do
      run <<-cmd
        cd #{deploy_to}/shared/nooku;
        svn update -q --force --accept 'theirs-full';
      cmd
    end
  end

  task :setup do
    transaction do
      run <<-CMD
        mkdir -p #{deploy_to}/releases;
        mkdir -p #{deploy_to}/shared;
        mkdir -p #{deploy_to}/shared/extension_uploads;
        mkdir -p #{public};
        chmod 755 #{public};

        cd #{deploy_to}/shared;
        curl -sLk #{symlinker_url} > symlinker;
        chmod +x symlinker;
      CMD

      joomla::setup
    end
  end

  task :restore do
    transaction do
      run "mkdir -p #{deploy_to}/releases"
      run "mkdir -p #{deploy_to}/shared"
      run "mkdir -p #{public}"
      run "chmod 755 #{public}"

      run <<-CMD
        cd #{deploy_to}/shared &&
        curl -sLk #{symlinker_url} > symlinker &&
        chmod +x symlinker
      CMD

      run "mv #{public}/configuration.php #{deploy_to}/shared/config.php"
      joomla::symlink
      joomla::install_default
    end
  end

  task :finalize_update, :except => { :no_release => true } do
    run "chmod -R g+w #{latest_release}" if fetch(:group_writable, true)
  end

  task :finalize do
    run <<-CMD
      cd #{latest_release};
      git submodule init;
      git submodule update;
    CMD
  end

  task :symlink_modules, :except => { :no_release => true } do
    extensions.each do |extension|
      real_path = "#{release_path}/#{extension}/media/#{extension}"
      up_path = "#{deploy_to}/shared/extension_uploads/#{extension}"

      run <<-CMD
        #{deploy_to}/shared/symlinker #{current_path}/#{extension} #{public};
        if [ -d #{real_path} ]; then
          mkdir -p #{up_path};
          ln -nsf #{up_path} #{real_path}/uploads;
        fi
      CMD

      # project specific
      run "ln -nfs #{deploy_to}/shared/com_gives_uploads #{public}/media/com_gives/uploads"
    end
  end

  task :start do ; end
  task :stop do ; end
  task :restart do ; end
end

after "deploy:symlink", "deploy:symlink_modules"
after "deploy:finalize_update", "deploy:finalize"
after "deploy:finalize_update", "deploy:symlink_modules"