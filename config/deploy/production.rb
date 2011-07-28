# repository info
set :branch, "master"

# This may be the same as your `Web` server
role :app, "sarniagives.com"

# directories
set :deploy_to, "/home/sgives/subdomains/live"
set :public, "#{deploy_to}/public_html"
set :extensions, %w[com_gives plg_ie6 public template]
