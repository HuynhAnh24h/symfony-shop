document.addEventListener('DOMContentLoaded', () => {
    const toasts = document.querySelectorAll('.toast');
    toasts.forEach((toast, index) => {
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transition = 'opacity 0.5s ease-in-out';
            setTimeout(() => toast.remove(), 500); // Xóa sau khi fade-out
        }, 4000 + index * 300); // Delay giữa các toast nếu có nhiều
    });
});