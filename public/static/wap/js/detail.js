layui.use('layer', () =>{

  // 获取jquery
  let $ = layui.$
  $('#btn-comment').on('click', function(e) {
    // console.log(e);
    let that = $(this)
    // 切换评论状态
    $('.detail-comment-box').toggle()
    
  })

  $('#id-edit').on('focus', function(e) {
    console.log('focus', e);
    $('.detail-comment-input').css({
      'border-color': '#5FB878'
    })
  })
  $('#id-edit').on('blur', function(e) {
    console.log('blur', e);
    $('.detail-comment-input').css({
      'border-color': '#ccc'
    })
  })
  
});


