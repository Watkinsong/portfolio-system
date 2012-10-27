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







# Script to create a release tar.gz -package from the commercial site.
# The release number is datestamp in form YYYYMMDD, and upon packaging the
# release number is replaced with variable WI_COMMERCIAL_SITE_VERSION in file
# version.php.

START_DIR=`pwd`
DATE="$(date +%Y%m%d)"
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd $DIR || exit 1
cd ..

TMP_DIR="/tmp/www.webinfra.net.$DATE"

# If the temporary directory exists, destroy it
if [ -d "$TMP_DIR" ]; then
  rm -rf $TMP_DIR
fi;

# Create a temporary directory to make a release
mkdir $TMP_DIR || exit 1
# Copy contents of the commercial site to the temporary directory
cp -R * $TMP_DIR || exit 1
# Remove build -folder, it is not needed to be included in the package
rm -rf $TMP_DIR/build
cd $TMP_DIR
# Replace the configration variable with the release number
sed -ie "s/WI_COMMERCIAL_SITE_VERSION/$DATE/" version.php
rm version.phpe
# Create the package
tar cfz $START_DIR/www.webinfra.net.$DATE.tar.gz * --exclude=".svn" --exclude="*~" --exclude="config.php" --exclude="default.config.php"
cd $START_DIR
# Destroy the temporary directory
rm -rf $TMP_DIR

