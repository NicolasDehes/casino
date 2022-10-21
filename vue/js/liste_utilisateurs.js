window.addEventListener("load", () => {
  document.querySelectorAll(".tooggleAdmin").forEach((e) => {
    e.addEventListener("change", () => {
      var formData = new FormData();
      id = e.dataset.id;
      formData.append("id", id);
      fetch("../api/admin.php?action=changeAdmin", {
        method: "POST",
        body: formData,
      });
    });
  });
});
