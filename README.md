# Random Crap Images

Got a folder full of stupid gifs and jpgs you've saved from 4chan over the last 10 years?

Yeah, me too.

Want a PHP script that'll just show you one of those images at random?

Yeah, me too.

Here you go.

## Installation/Requirements

PHP5+, Apache or some other web server. I'm hosting this on my Mac (confirmed to work on Mountain Lion through Yosemite) though you have to set up your Mac to use Apache and PHP. [Read a guide on how to do it.](http://lmgtfy.com/?q=how+to+allow+apache+php+on+a+mac)

Put this directory somewhere web-accessible. Make the folder of crap images web-accessible, I've supplied `apache-site.conf` as an example of how to do that. You'll need to include that in your Apache config.

Update `index.php` with the path to your folder of crap images and the URL you're hosting it on.

## Usage

Go to the URL you're hosting it at. Whoa. Keep hitting refresh for new images.

Also, if you want just GIFs, add ?gif like so: http://your-host.com/random-crap/?gif

Also, if you want a JSON result, add ?json the same way.

## Notes

I've added a `fix_perms.sh` file for a Mac or Linux box to make sure the images in the folder are web-viewable.