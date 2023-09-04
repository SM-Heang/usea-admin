<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1
  </div>
  <strong>Copyright &copy; 2006-2023 <a href="https://usea.edu.kh">University of South-East Asia</a>.</strong> All rights reserved.
</footer>

{{-- douplicate form --}}
<script>
  // Function to duplicate the div
  function duplicateDiv() {
      // Get the quantity from the input
      var quantity = parseInt(document.getElementById("quantityInput").value);
      var quantityInput = document.getElementById("quantityInput");
      quantityInput.value = "";
      // Clone and append the original div multiple times
      for (var i = 0; i < quantity; i++) {
          var originalDiv = document.getElementById("originalDiv");
          var clonedDiv = originalDiv.cloneNode(true);

          // Generate a unique ID for the cloned div (optional)
          clonedDiv.id = "clonedDiv" + new Date().getTime();

          // Append the cloned div to the container
          document.getElementById("divContainer").appendChild(clonedDiv);
      }
  }

  // Add an event listener to the button
  document.getElementById("duplicateButton").addEventListener("click", duplicateDiv);
</script>