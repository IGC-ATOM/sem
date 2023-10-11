count_stats() {
    characters=$(wc -c < "$filename")
    words=$(wc -w < "$filename")
    lines=$(wc -l < "$filename")

    echo "Character count: $characters"
    echo "Word count: $words"
    echo "Line count: $lines"
}

# Function to display the file in reverse
reverse_file() {
    tac "$filename"
}

word_frequency() {
    read -p "Enter the word to find frequency: " target_word
    frequency=$(grep -o -i -w "$target_word" "$filename" | wc -l)
    echo "Frequency of '$target_word': $frequency"
}

replace_uppercase() {
    tr '[:upper:]' '[:lower:]' < "$filename"
}

read -p "Enter the filename: " filename

while true; do
    echo "Options:"
    echo "1. Count characters, words, and lines"
    echo "2. Display the file in reverse"
    echo "3. Find the frequency of a particular word"
    echo "4. Replace uppercase letters with lowercase letters"
    echo "5. Quit"

    read -p "Enter your choice: " choice

    case "$choice" in
        1)
            count_stats
            ;;
        2)
            reverse_file
            ;;
        3)
            word_frequency
            ;;
        4)
            replace_uppercase
            ;;
        5)
            echo "Exiting..."
            exit 0
            ;;
        *)
            echo "Invalid choice. Please try again."
            ;;
    esac
done
