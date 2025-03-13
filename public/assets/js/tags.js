document.addEventListener("DOMContentLoaded", function () {
    var input = document.querySelector("#tags");
        var tagify = new Tagify(input, {
            originalInputValueFormat: (valuesArr) =>
                valuesArr.map((item) => item.value).join(","),
            maxTags: 5,
        });
});
