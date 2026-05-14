function applySavedMode() {
    var savedMode = localStorage.getItem("mode");

    if (savedMode === "dark") {
        document.documentElement.classList.add("dark-mode");
    } else {
        document.documentElement.classList.remove("dark-mode");
    }
}

applySavedMode();

function toggleMode() {
    document.documentElement.classList.toggle("dark-mode");

    if (document.documentElement.classList.contains("dark-mode")) {
        localStorage.setItem("mode", "dark");
    } else {
        localStorage.setItem("mode", "light");
    }
}

function filterRegions(category) {
    var cards = document.querySelectorAll(".region-card");
    var buttons = document.querySelectorAll(".filter-btn");

    for (var i = 0; i < buttons.length; i++) {
    buttons[i].classList.remove("active-filter");
}

    var selectedButton = document.querySelector('[data-filter="' + category + '"]');
        selectedButton.classList.add("active-filter");
    

    for (var j = 0; j < cards.length; j++) {
    var cardCategory = cards[j].getAttribute("data-category");

    if (category === "all" || cardCategory === category) {
        cards[j].style.display = "block";
    } else {
        cards[j].style.display = "none";
    }
}
}

function confirmDelete() {
    return confirm("هل أنت متأكد من حذف هذا المحتوى؟");
}

function validateLoginForm(form) {
    var username = form.username.value.trim();
    var password = form.password.value.trim();

    if (username === "" || password === "") {
        alert("يرجى إدخال اسم المستخدم وكلمة المرور.");
        return false;
    }

    return true;
}

function validateContentForm(form) {
    var requiredFields = [
        "name",
        "category",
        "short_description",
        "description",
        "history",
        "culture",
        "landmarks",
        "main_image",
        "image_one",
        "image_two",
        "image_three"
    ];

 for (var i = 0; i < requiredFields.length; i++) {
    var field = form[requiredFields[i]];

    if (!field || field.value.trim() === "") {
        alert("يرجى تعبئة جميع الحقول.");
        return false;
    }
}

var imageFields = [
    "main_image",
    "image_one",
    "image_two",
    "image_three"
];

for (var j = 0; j < imageFields.length; j++) {
    var imageValue = form[imageFields[j]].value.trim();

    var isWebLink = imageValue.startsWith("http://") || imageValue.startsWith("https://");

    var isAssetImage =
        imageValue.startsWith("assets/images/") &&
        (
            imageValue.endsWith(".jpg") ||
            imageValue.endsWith(".jpeg") ||
            imageValue.endsWith(".png") ||
            imageValue.endsWith(".webp")
        );

    if (!isWebLink && !isAssetImage) {
        alert("يرجى إدخال رابط صورة صحيح أو مسار مثل assets/images/image.jpg");
        return false;
    }
}

return true;
}