calculate_simple_interest() {
    principal="$1"
    rate="$2"
    time="$3"

    interest=$(( (principal * rate * time) / 100 ))

    echo "Principal Amount: $principal"
    echo "Rate of Interest: $rate%"
    echo "Time Period (in years): $time"
    echo "Simple Interest: $interest"
}

read -p "Enter Principal Amount: " principal
read -p "Enter Rate of Interest (in percentage): " rate
read -p "Enter Time Period (in years): " time

calculate_simple_interest "$principal" "$rate" "$time"
