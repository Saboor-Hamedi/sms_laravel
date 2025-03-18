var simplemde = new SimpleMDE({
    element: document.getElementById("paragraph"),
    autosave: {
        enabled: true,
        uniqueId: "paragraph",
        delay: 1000,
    },
     toolbar: [
        "heading", "unordered-list", "ordered-list", "link", "image"
    ],
    renderingConfig: {
        singleLineBreaks: false,
        codeSyntaxHighlighting: true,
    },
    spellChecker: false,
    status: false,
    tabSize: 4,
    // toolbar: false,
    toolbarTips: false,
});


