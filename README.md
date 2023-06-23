NOTE: This work has been superseded by https://raw.githubusercontent.com/SimonFair/NUT-unRAID/master/plugin/nut-2.8.0.plg
================

~~I am not a developer. I have cobbled this together based on the notes below from dmacias72. I'll do my best to keep this running.~~

~~unRAID Nut Plugin~~
================

~~These are notes more for my memory or for anyone who wants to make unRAID plugins using this structure~~

~~I manage this with Ubuntu 22.04 as my "dev box".~~

~~I use VS Code as an editor with git plugin to upload to github~~

~~copy tar-1.13 from unRAID to /bin/tar-1.13 on dev box.~~

~~copy makepkg from unRAID to /sbin/makepkg on dev box.~~

~~I modified gfjardim's pkg_build.sh to take an argument, add -plugin to name and add arch type, plus modified the lettering function~~

~~To compile the packages for unRAID plugin run from the source directory~~

~~sudo ./mkpkg nut~~

~~This creates a slackware compliant package and md5 in the archive directory with the date as the version number~~

~~And adds the date to the plugin file in plugins directory.~~

~~e.g. nut-plugin-2017.06.09-x86_64-1.txz and nut-plugin-2016.06.09-x86_64-1.md5~~
