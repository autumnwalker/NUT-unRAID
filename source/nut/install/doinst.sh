#!/bin/sh
BOOT="/boot/config/plugins/nut"
DOCROOT="/usr/local/emhttp/plugins/nut"

# Add nut user and group for udev at shutdown
if [ $( grep -ic "218" /etc/group ) -eq 0 ]; then
    groupadd -g 218 nut
fi

if [ $( grep -ic "218" /etc/passwd ) -eq 0 ]; then
    useradd -u 218 -g nut -s /bin/false nut
fi

# Update file permissions of scripts
chmod +0755 $DOCROOT/scripts/* \
        /etc/rc.d/rc.nut \
        /usr/sbin/nut-notify

# copy the default
cp -nr $DOCROOT/default.cfg $BOOT/nut.cfg

# remove nut symlink and link to /etc/ups
if [ -L /etc/nut ]; then
    rm -f /etc/nut
    mkdir /etc/nut
fi

# remove /etc/ups and create symlink
rm -rf /etc/ups
ln -s /etc/nut /etc/ups

# copy conf files
cp -nr $DOCROOT/nut/* /etc/nut

if [ -d $BOOT/ups ]; then
    cp -f $BOOT/ups/* /etc/nut
fi

# update permissions
if [ -d /etc/nut ]; then
    chown -R 218:218 /etc/nut
    chmod -R -r /etc/nut
fi
