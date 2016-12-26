OutPutFileName=$(echo $1 | sed 's/\.[^\.]*$//')
ffmpeg -i $1 -an -r 15 -pix_fmt rgb24 -vf scale=300:-1 -f gif "${OutPutFileName}.gif"