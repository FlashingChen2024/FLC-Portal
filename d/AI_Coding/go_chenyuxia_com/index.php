function scrollToForm() {
    console.log('开始执行滚动函数');
    
    // 尝试立即滚动
    const form = document.getElementById('applyForm');
    if (form) {
        scrollWithOffset(form);
        console.log('立即找到表单元素并执行滚动');
        return;
    }
    
    // 如果没找到元素，等待200ms后重试（可能被弹窗阻塞渲染）
    setTimeout(() => {
        const form = document.getElementById('applyForm');
        if (form) {
            scrollWithOffset(form);
            console.log('延迟找到表单元素并执行滚动');
        } else {
            console.error('未找到ID为 applyForm 的表单元素');
        }
    }, 200);
}

function scrollWithOffset(form) {
    // 调整滚动位置计算，确保更准确的滚动效果
    const offsetTop = form.getBoundingClientRect().top + window.scrollY;
    const headerHeight = document.querySelector('.hero').clientHeight; // 获取顶部区域高度
    const targetTop = offsetTop - headerHeight - 20; // 根据顶部区域高度调整滚动位置
    
    window.scrollTo({
        top: targetTop,
        behavior: 'smooth'
    });
}