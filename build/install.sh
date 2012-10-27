#!/bin/bash


INSTALL_DIR="/var/www/portfolio_install"
PUBLIC_HTML_DIR="/var/www/html/portfolio"
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd $DIR/../


if [ -d "$INSTALL_DIR" ]; then
  rm -rf $INSTALL_DIR
fi;

if [ -d "$PUBLIC_HTML_DIR" ]; then
  rm -rf $PUBLIC_HTML_DIR
fi;

mkdir $INSTALL_DIR
mkdir $INSTALL_DIR/db
mkdir $INSTALL_DIR/templates
mkdir $INSTALL_DIR/src

mkdir $PUBLIC_HTML_DIR
mkdir $PUBLIC_HTML_DIR/css
mkdir $PUBLIC_HTML_DIR/images

cp src/*.php $INSTALL_DIR/src
mv $INSTALL_DIR/src/index.php $PUBLIC_HTML_DIR/
mv $INSTALL_DIR/src/Application.php $PUBLIC_HTML_DIR
cp css/*.css $PUBLIC_HTML_DIR/css
cp templates/*.tpl.php $INSTALL_DIR/templates
cp db/*.ini $INSTALL_DIR/db
cp images/*.jpg $PUBLIC_HTML_DIR/images/
cp images/*.png $PUBLIC_HTML_DIR/images/

ESCAPED_INSTALL_DIR=$(echo "$INSTALL_DIR" | sed "s/\//\\\|/g" | sed "s/|/\//g")

sed -ie "s/PORTFOLIO_INSTALL_DIR/${ESCAPED_INSTALL_DIR}/" ${PUBLIC_HTML_DIR}/Application.php

if [ -f "$PUBLIC_HTML_DIR/Application.phpe" ]; then
  rm "$PUBLIC_HTML_DIR/Application.phpe"
fi;

exit;

