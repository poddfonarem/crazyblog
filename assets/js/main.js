function toggleSettingsForm() {
    let form = document.getElementById("settings");
    let addPost = document.getElementById("addPost");
    form.style.display = (form.style.display === "none" || form.style.display === "") ? "block" : "none";
    addPost.style.display = (addPost.style.display === "none" || addPost.style.display === "") ? "none" : "none";
}
function toggleAddPostForm() {
    let form = document.getElementById("addPost");
    let settings = document.getElementById("settings");
    form.style.display = (form.style.display === "none" || form.style.display === "") ? "block" : "none";
    settings.style.display = (settings.style.display === "none" || settings.style.display === "") ? "none" : "none";
}