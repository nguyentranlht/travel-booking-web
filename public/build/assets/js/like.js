$(document).ready(function() {
    $(document).on("click", ".like-btn", function() {
        let button = $(this);
        let tourId = button.data("tour-id");

        $.ajax({
            url: `/like/${tourId}`,
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function(response) {
                let liked = response.status === "liked";
                let tourId = button.data("tour-id");
            
                // Lưu trạng thái vào Local Storage
                localStorage.setItem(`liked_tour_${tourId}`, liked);
            
                // Cập nhật tất cả các nút thích có cùng tour_id trên trang
                $(".like-btn[data-tour-id='" + tourId + "']").each(function() {
                    if (liked) {
                        $(this).addClass("liked");
                        $(this).find(".like-icon").removeClass("fa-regular").addClass("fa-solid");
                    } else {
                        $(this).removeClass("liked");
                        $(this).find(".like-icon").removeClass("fa-solid").addClass("fa-regular");
            
                        // Nếu đang ở trang Favorite Tours, ẩn và xóa tour khỏi danh sách
                        if (window.location.pathname === "/liked-tours") {
                            $(this).closest(".col-md-4").fadeOut(300, function() {
                                $(this).remove();
                            });
                        }
                    }
                });
            },            
        });
    });

    // Khi tải lại trang index, kiểm tra trạng thái thích từ Local Storage
    $(".like-btn").each(function() {
        let button = $(this);
        let tourId = button.data("tour-id");

        let liked = localStorage.getItem(`liked_tour_${tourId}`) === "true";
        if (liked) {
            button.addClass("liked");
            button.find(".like-icon").removeClass("fa-regular").addClass("fa-solid");
        } else {
            button.removeClass("liked");
            button.find(".like-icon").removeClass("fa-solid").addClass("fa-regular");
        }
    });

    // Khi người dùng nhấn "Back", cập nhật trạng thái like
    $(window).on("pageshow", function () {
        $(".like-btn").each(function () {
            let button = $(this);
            let tourId = button.data("tour-id");
    
            let liked = localStorage.getItem(`liked_tour_${tourId}`) === "true";
            if (liked) {
                button.addClass("liked");
                button.find(".like-icon").removeClass("fa-regular").addClass("fa-solid");
            } else {
                button.removeClass("liked");
                button.find(".like-icon").removeClass("fa-solid").addClass("fa-regular");
            }
        });
    });
});
