echo "Enter 1st Number :"
read a
echo "Enter 2nd Number :"
read b

if [ $a -gt $b ]; then
        echo "$a is highest Number"
else
        echo "$b is highest Number"
fi
