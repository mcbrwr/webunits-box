Vagrant::Config.run do |config|

  # Enable the Puppet provisioner, with will look in manifests
  config.vm.provision :puppet do |puppet|
    puppet.manifests_path = "manifests"
    puppet.manifest_file = "default.pp"
    puppet.module_path = "modules"
  end

  # Every Vagrant virtual environment requires a box to build off of.
  config.vm.box = "lucid64"
  config.vm.box_url = "http://files.vagrantup.com/lucid64.box"
  #config.vm.share_folder "vhost", "/vhost", "vhost", :owner=> 'vagrant', :group=>'vagrant', :extra => 'dmode=777,fmode=777'
  
  # Forward guest port 80 to host port 8888 and name mapping
  # config.vm.forward_port 80, 8000
  # config.vm.forward_port 22, 2222
  config.vm.forward_port 80, 8000
end
