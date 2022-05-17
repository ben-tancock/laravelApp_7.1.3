#!/bin/bash

# Redirect output into stderr
exec 1>&2

if [ ! -d .git ]; then
    echo "Project is not a git repository!"
    exit -1
fi

install_hook() {
    echo "Installing git hook: $1"
    cp hooks/$1 .git/hooks/$1
    chmod +x .git/hooks/$1
}

install_hook "pre-commit"

