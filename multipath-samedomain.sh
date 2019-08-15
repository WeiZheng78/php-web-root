#!/bin/bash
cd /var/www/html/
mv admin admin.old
mkdir admin
mv admin.old admin/admin
mv users users.old
mkdir users
mv users.old users/users
