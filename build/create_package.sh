#!/bin/bash

START_DIR=`pwd`
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
cd $DIR || exit 1
cd ..

TMP_DIR="/tmp/portfolio_system"

# If the temporary directory exists, destroy it
if [ -d "$TMP_DIR" ]; then
  rm -rf $TMP_DIR
fi;

# Create a temporary directory and necessary subfolders
mkdir $TMP_DIR || exit 1
mkdir $TMP_DIR/build
mkdir $TMP_DIR/css
mkdir $TMP_DIR/db
mkdir $TMP_DIR/src
mkdir $TMP_DIR/templates

# Copy only valid files to the temporary directory
cp build/*.sh $TMP_DIR/build
cp css/*.css $TMP_DIR/css
cp db/*.ini $TMP_DIR/db
cp -R downloads $TMP_DIR
cp -R images $TMP_DIR
cp src/*.php $TMP_DIR/src
cp templates/*.php $TMP_DIR/templates

# Create the package
cd $TMP_DIR
cd ..
tar cfz $START_DIR/portfolio-system.tar.gz portfolio_system
cd $START_DIR
# Destroy the temporary directory
rm -rf $TMP_DIR

