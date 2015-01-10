Basic configuration for setting for adding a new cwp in [VVV](https://github.com/Varying-Vagrant-Vagrants/VVV/).

For more information on how to use this to create new cwps, see [my article on using Vagrant in Torque](http://torquemag.io/getting-started-vagrant-local-development/).

### Instructions:
* In VVV's www directory, create a new folder and give it a name.
* Add and configure WordPress in that directory according to your personal taste
* Clone or copy this repo in that directory.
* In each file from this repo change "cwp" to whatever you called the parent directory.
* vagrant provision
* cd cwp
* composer update
* cd public_html/cwp-content/cwp-theme
* composer update
* npm install
* grunt
* cd vendor/calderawp/baldrick-wp-front-end
* npm install
* grunt
* figure out how to automate all or most of that.

You may or may not need to vagrant halt and vagrant up to get it to work.
