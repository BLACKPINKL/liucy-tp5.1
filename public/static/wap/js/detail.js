layui.use('layer', () =>{
  // 获取jquery
  let $ = layui.$
  $('#btn-comment').on('click', function(e) {
    console.log(e);
    let that = $(this)
    // 切换评论状态
    $('.detail-comment-box').toggle()
    
  })
  
});


