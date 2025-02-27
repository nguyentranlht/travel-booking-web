<footer class="footer">
    <div class="container">
        <div class="left-section">
            <img src="logo.png" alt="Logo" class="logo">
            <p>Travel helps companies manage payments easily.</p>
            <div class="social-icons">
                <a href="#" class="social-icon">in</a>
                <a href="#" class="social-icon">f</a>
                <a href="#" class="social-icon">yt</a>
            </div>
        </div>
        <div class="middle-section">
            <div class="company">
                <h3>Company</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Pricing</a></li>
                </ul>
            </div>
            <div class="destinations">
                <h3>Destinations</h3>
                <ul>
                    <li><a href="#">Maldives</a></li>
                    <li><a href="#">Los Angeles</a></li>
                    <li><a href="#">Las Vegas</a></li>
                    <li><a href="#">Toronto</a></li>
                </ul>
            </div>
        </div>
        <div class="right-section">
            <h3>Join Our Newsletter</h3>
            <input type="email" placeholder="Your email address">
            <button>Subscribe</button>
            <p>*Will send you weekly updates for your better tour packages.</p>
        </div>
    </div>
    <div class="copyright">
        <p>Copyright @ Xpro 2022. All Rights Reserved.</p>
    </div>
</footer>

<style>
    body {
    margin: 0;
    font-family: sans-serif;
    background-color: #f0f0f0; /* Màu nền xám nhạt */
}

.footer {
    background-color: #76B168; /* Màu nền xanh nhạt */
    padding: 40px 20px;
}

.container {
    display: flex;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
}

.left-section {
    flex-basis: 25%;
}

.middle-section {
    display: flex;
    justify-content: space-around;
    flex-basis: 40%;
}

.right-section {
    flex-basis: 30%;
}

.logo {
    height: 50px; /* Điều chỉnh kích thước logo */
}

.social-icons {
    margin-top: 20px;
}

.social-icon {
    display: inline-block;
    width: 30px;
    height: 30px;
    background-color: #d3d3d3; /* Màu xám nhạt */
    text-align: center;
    line-height: 30px;
    border-radius: 50%;
    margin-right: 10px;
    text-decoration: none;
    color: #333;
}

.social-icon:hover {
    background-color: #555;
    color: white;
}

.company ul, .destinations ul {
    list-style: none;
    padding: 0;
}

.company li, .destinations li {
    margin-bottom: 10px;
}

.company a, .destinations a {
    text-decoration: none;
    color: #333;
}

.company a:hover, .destinations a:hover {
    text-decoration: underline;
}

input[type="email"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    background-color: #f08080; /* Màu đỏ nhạt */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #e06666; /* Màu đỏ đậm hơn */
}

.copyright {
    text-align: center;
    margin-top: 40px;
    padding-top: 20px;
    border-top: 1px solid #ccc;
}
</style>