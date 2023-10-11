echo "Enter First Number:"
read num1
echo "Enter Second Number:"
read num2
echo "Select an opration (+,-,*,/):"
read ope

case $ope in
      +)
        result=$(($num1+$num2))
        echo "result : $result"
      ;;

      -)
       result=$(($num1-$num2))
       echo "result : $result"
      ;;

      *)
      result=$(($num1+$num2))
      echo "result : $result"
      ;;
      
      /)
      result=$(($num1+$num2))
      echo "result : $result"
      ;;
esac
