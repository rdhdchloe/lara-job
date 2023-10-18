import Tagify from '@yaireo/tagify'

var input = document.getElementById("tags");
// tagifyの設定
var tagify = new Tagify(input, {
  whitelist:[],
  originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(','),
  dropdown:{
    enabled: 0,
    closeOnSelect: false,
  },
}),
controller; // for aborting the call

  // 入力で検索結果を取得する
// tagify.on('input', onInput)
// function onInput( e ){
// var value = e.detail.value
// tagify.whitelist = null // whitelistをリセットする
// controller && controller.abort()
// controller = new AbortController()
// fetch(`/tags/search?search=${value}`, {signal:controller.signal})
//   .then(RES => RES.json())
//   .then(function(newWhitelist){
//     tagify.whitelist = newWhitelist // ホワイトリストに代入する
//     tagify.loading(false).dropdown.show(value) // 関連する結果を表示させる
//   })
// }
