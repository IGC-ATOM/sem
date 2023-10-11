print_pattern() {
    n="$1"
    for i in $(seq 1 "$n"); do
        for j in $(seq 1 "$i"); do
            echo -n "$j "
        done
        echo
    done
}

read -p "Enter the value of n: " n

print_pattern "$n"
