#!/bin/bash

for file in *; do
    if [[ $file =~ .*".html" ]]; then
        filename=`echo $file | cut -d "." -f 1`
        mv "$filename.html" "$filename.php"
    fi
done