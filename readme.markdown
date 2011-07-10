# Sarnia Gives Website

Currently use Nooku v3477

Source for Sarnia Gives. Includes template, IE6 notification and organization/volunteer/opportunities listings.

## Instructions

`git clone git@github.com:CCI-Studios/Sarnia-Gives.git sarnia-gives
cd sarnia-gives
git submodule init
git submodule update`

Copy `config/deploy/remote.rb` and save as staging or production to configure site specific settings

type:
`cap deploy:setup
cap deploy:joomla:setup
cap deploy`
to setup the project on the server

After renaming your template, to add html overrides enter:
`git submodule add git@github.com:CCI-Studios/Joomla-1.5-Template-Overrides.git template/NAME/html
git init
git update`

Extra Extensions
 - sh404SEF
 - Advanced Module Manager
 - JCE
 - Akeeba Backup
 - Updateman
 - mod_jf_twitter