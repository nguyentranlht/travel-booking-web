
<header class="header">
    <div class="left-section">
        <a href="#" class="find-flight">Find Flight</a>
        <a href="#" class="find-stays">Find Stays</a>
    </div>
    <div class="logo">
        <img src="logo.png" alt="Logo"> 
    </div>
    <div class="right-section">
        <a href="{{ route('login') }}" class="login">Login</a>
        <a href="{{ route('register') }}" class="signup">Sign up</a>
    </div>
</header>

<style>
 body {
    margin: 0;
    font-family: sans-serif;
    background-color: #f0f0f0; /* Màu nền xám nhạt */
}

.header {
    background-color: #90ee90; /* Màu nền xanh nhạt */
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
}

.left-section a, .right-section a {
    text-decoration: none;
    color: #333;
    margin: 0 10px;
    padding: 8px 15px;
    border-radius: 5px;
}

.left-section a:hover, .right-section a:hover {
    background-color: #d3d3d3; /* Hiệu ứng hover màu xám nhạt */
}

.logo img {
    height: 50px; /* Điều chỉnh kích thước logo */
}

.right-section a.signup {
    background-color: #333;
    color: white;
}

.right-section a.signup:hover {
    background-color: #555;
}
</style>