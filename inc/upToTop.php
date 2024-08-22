<style>
    #scrollToTop {
        display: none; /* Ẩn button khi không cần thiết */
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 99;
        font-size: 14px;
        border: none;
        outline: none;
        background-color: #ff7800;
        color: white;
        cursor: pointer;
        padding: 12px;
        border-radius: 50%;
    }
</style>
<button onclick="scrollToTop()" id="scrollToTop">Lên đầu trang</button>

<script>
		  // Lấy button
		  var scrollToTopBtn = document.getElementById("scrollToTop");

			// Khi người dùng cuộn trang, hiển thị hoặc ẩn button
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
				if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
					scrollToTopBtn.style.display = "block";
				} else {
					scrollToTopBtn.style.display = "none";
				}
			}

			// Khi người dùng click button, cuộn đến đầu trang
			function scrollToTop() {
				document.body.scrollTop = 0; // Cho Safari
				document.documentElement.scrollTop = 0; // Cho Chrome, Firefox, IE và Opera
			}
	</script>