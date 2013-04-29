class apache {

  package { "apache2":
    ensure  => present,
    require => Exec["apt-get update"],
    notify  => Exec["update_apache_user"]
  }

  file { "/etc/apache2/mods-enabled/rewrite.load":
    ensure  => link,
    target  => "/etc/apache2/mods-available/rewrite.load",
    require => Package["apache2"]
  }

  service { "apache2":
    ensure    => running,
    subscribe => Package["apache2"]
  }

  file { "/etc/apache2/sites-enabled/000-default":
    ensure  => absent,
    require => Package['apache2']
  }

  file { "/etc/apache2/sites-enabled/vagrant":
    ensure => link,
    target => "/vagrant/configfiles/apache_vhost",
    notify  => Service['apache2'],
    require => Package['apache2']
  }
  exec { "update_apache_user":
    require => Package["apache2"],
    notify  => Service["apache2"],
    command => "sed -i 's/www-data/vagrant/g' /etc/apache2/envvars",
  }->
  exec { "update_apache_lockfile":
    command => "chown vagrant:vagrant /var/lock/apache2",
  }

  #exec { "restart apache":
  #  before  => Exec["update_apache_user"],
  #  command => "/etc/init.d/apache2 restart"
  #}


}





#  file { "/etc/apache2/sites-available/default":
#    ensure  => present,
#    source  => "/vagrant/configfiles/apache_vhost",
#    notify  => Service['apache2']
#  }

#  file { "/etc/apache2/sites-enabled/default":
#    ensure => link,
#    target => "/etc/apache2/sites-available/default",
#    require => File["/etc/apache2/sites-available/default"],
#  }

#  exec { "update_apache_user":
#    command => "sed -i 's/www-data/vagrant/g' /etc/apache2/envvars",
#    notify  => Service["apache2"]
#  }

#  exec { "update_apache_lockfile":
#    command => "chown vagrant:vagrant /var/lock/apache2",
#    require => Service["apache2"]
#  }
