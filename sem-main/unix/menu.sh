count_stats() {
    char_count=$(wc -m < "$file")
    word_count=$(wc -w < "$file")
    line_count=$(wc -l < "$file")
    echo "Character count: $char_count"
    echo "Word count: $word_count"
    echo "Line count: $line_count"
}
print_reverse() {
    tac "$file"
}
find_word_frequency() {
    read -p "Enter a word to find its frequency: " search_word
    word_frequency=$(grep -o -i -w "$search_word" "$file" | wc -l)
    echo "Frequency of '$search_word' in the file: $word_frequency"
}
replace_uppercase() {
    tr 'A-Z' 'a-z' < "$file"
}
while true; do
    echo "Options:"
    echo "1. Count of characters, words, and lines"
    echo "2. Print file in reverse"
    echo "3. Frequency of a particular word"
    echo "4. Replace upper-case letters with lower-case"
    echo "5. Quit"
    read -p "Enter your choice: " choice
    case "$choice" in
        1)
            count_stats
            ;;
        2)
            print_reverse
            ;;
        3)
            find_word_frequency
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

