layui.use(['layer'], () =>{

  // 获取jquery
  let $ = layui.$
  let layer = layui.layer
  let val = ''
  $('#btn-comment').on('click', function(e) {
    // console.log(e);
    let that = $(this)
    // 切换评论状态
    $('.detail-comment-box').toggle()
    
  })


  $('#id-edit').on('input', function(e) {
    let that = $(this)
    val = that.text()

  })

  $('#id-edit').on('focus', function(e) {
    console.log('focussssssssssss', e);
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


  $('#id-comment-btn').on('click', function(e) {
    if(!val) return layer.msg('请填写评论')
    

    $.ajax({
      url: 'comment',
      method: 'post',
      data: {
        comment: val,
      },
      success(res) {
        var data = "{$data.title}"
        console.log(data);
        
      }
    })
  })

  
  
});


