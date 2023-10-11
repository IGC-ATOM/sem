filename="records.txt"

enter_record() {
    echo "Enter a new record (format: Name Age Email):"
    read -p "Name: " name
    read -p "Age: " age
    read -p "Email: " email

    record="$name $age $email"
    echo "$record" >> "$filename"
    echo "Record added successfully!"
}

while true; do
    echo "Options:"
    echo "1. Enter a new record"
    echo "2. Quit"
    read -p "Enter your choice: " choice

    case "$choice" in
        1)
            enter_record
            ;;
        2)
            echo "Exiting..."
            exit 0
            ;;
        *)
            echo "Invalid choice. Please try again."
            ;;
    esac
done
