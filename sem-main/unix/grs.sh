compute_gross_salary() {
    basic_salary="$1"

    if [ "$basic_salary" -lt 1500 ]; then
        hra=$((basic_salary * 10 / 100))
        da=$((basic_salary * 90 / 100))
    else
        hra=500
        da=$((basic_salary * 98 / 100))
    fi

    gross_salary=$((basic_salary + hra + da))
    echo "Basic Salary: $basic_salary"
    echo "HRA: $hra"
    echo "DA: $da"
    echo "Gross Salary: $gross_salary"
}

read -p "Enter Basic Salary: " basic_salary

compute_gross_salary "$basic_salary"
