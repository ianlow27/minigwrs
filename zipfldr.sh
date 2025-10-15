#!/bin/sh

# Check if the first argument is passed
if [ -z "$1" ]; then
    echo "No folder name provided. Exiting..."
    exit 1
fi

# Get the folder name from the first argument
FOLDER_NAME="$1"

# Check if the folder exists
if [ ! -d "$FOLDER_NAME" ]; then
    echo "The specified folder does not exist. Exiting..."
    exit 1
fi

# Get the current date and time in the format 250923-1534 (DDMMYY-HHMM)
CURRENT_DATETIME=$(date +"%y%m%d-%H%M")

# Create the zip filename
ZIP_FILENAME="${FOLDER_NAME}_${CURRENT_DATETIME}.zip"

# Recursively zip the folder
zip -r "$ZIP_FILENAME" "$FOLDER_NAME"

# Provide feedback to the user
echo "Folder '$FOLDER_NAME' has been zipped as '$ZIP_FILENAME'."

