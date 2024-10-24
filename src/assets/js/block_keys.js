const sqlInjectionChars = [
    0,  // NULL
    8,  // Backspace
    9,  // Tab
    10, // LineFeed
    13, // Carriage Return
    26, // Substitute
    34, // "
    37, // %
    39, // '
    59, // ;
    92, // \ (Backslash)
    95, // _
];

function blockKeys(keyPressed) {
    return !sqlInjectionChars.includes(keyPressed);
}
