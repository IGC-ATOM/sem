calculate_compound_interest() {
    principal="$1"
    rate="$2"
    time="$3"


    n=1

    r=$(echo "scale=4; $rate / 100" | bc)

    a=$(echo "scale=2; $principal * (1 + ($r / $n)) ^ ($n * $time)" | bc)

    interest=$(echo "scale=2; $a - $principal" | bc)

    echo "Principal Amount: $principal"
    echo "Annual Rate of Interest: $rate%"
    echo "Time Period (in years): $time"
    echo "Compound Interest: $interest"
    echo "Total Amount: $a"
}

read -p "Enter Principal Amount: " principal
read -p "Enter Annual Rate of Interest (in percentage): " rate
read -p "Enter Time Period (in years): " time

calculate_compound_interest "$principal" "$rate" "$time"
