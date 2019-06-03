<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>サンプルテンプレート</title>
    <meta name="description" content="サンプルテンプレート">
    <meta name="keywords" content="レストラン,フレンチ,原宿">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/common.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery.js"></script>
	
	<!--vueとphpにvueからデータを送る機能を付与するaxiosを読み込みます。-->
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
	
	<style type="text/css" media="screen">
	.profBox{
		border:1px solid #ededed;
		padding:25px;
		width:94%;
		max-width:680px;
		margin-left:auto;
		margin-right:auto;
		margin-top:50px;
		margin-bottom:50px;
		box-sizing: border-box;
	}
	
	.profBox h1{
		background:#f2f2f2;
		padding:15px;
		margin-bottom:20px;
		margin-top:0px;
		font-size:1.1em;
	}
	
	.profBox dl dt{
		border-bottom:1px solid #ededed;
		padding-bottom:10px;
		margin-bottom:15px;
		font-weight:bold;
	}
	
	.profBox dl dd{
		margin-bottom:25px;	
		margin-left:0px;
	}
	
	.inputText{
		width:100%;
		padding:10px!important;
		font-size:1.1em;
		box-sizing: border-box;
	}
	
	.select_form {
		width: 100%;
		text-align: center;
	}
	
	.select_form select {
		font-size:1.1em;
		width: 100%;
		padding-right: 1em;
		cursor: pointer;
		border: none;
		background:#fff;
		box-shadow: none;
		-webkit-appearance: none;
		appearance: none;
	}
	
	.select_form.select_form_inner {
		position: relative;
		border: 1px solid #c0c0c0;
		border-radius: 2px;
		background: #ffffff;
	}
	.select_form.select_form_inner:before {
		content: "";
		display:block;
		position: absolute;
		top: 0.8em;
		right: 0.9em;
		width:10px;
		height:10px;
		border-left: 1px solid #c0c0c0;
		border-bottom: 1px solid #c0c0c0;
		pointer-events: none;
		transform: rotate(-45deg);
		margin-top:-3px;
	}
	.select_form.select_form_inner select {
		padding: 8px 38px 8px 8px;
		color: #c0c0c0;
	}
	
	.textboxdata{
		border: 1px solid #c0c0c0;
		width:100%;
		height:150px;
		padding:15px;
		font-size:1.1em;
		box-sizing: border-box;
	}
	
	.btnStyle1{
		background:#000;
		color:#fff;
		width:250px;
		display:block;
		margin-left:auto;
		margin-right:auto;
		font-size:1em;
		padding:15px;
		border:none;
		border-radius: 5px;
	}
	.erroebox{
		color:#d91313;
		padding-top:10px;
	}
	.delatearea{
		position: absolute;
		left: -9999px;
	}
	.mgb10px{
		margin-bottom:10px;
	}
	</style>
</head>
<body>
	
	<div class="profBox" id="formarea">
		
		<h1>メールフォーム</h1>
		
		<dl>
			<dt>メールアドレス※</dt>
			<dd>
				<!--v-bind:classでクラスをつけたり消したりできます。-->
				<!--inputdataの中身がtrueであれば、クラスdelateareaが付与されます。-->
				<!--delateareaはposishonにより画面外に移動させることで対象要素を消します。-->
				<!--下記は、入力フォームエリアです。-->
				<div v-bind:class="{ delatearea: inputdata }">
					<input type="text" name="mailarea"  placeholder="info@startout.work" class="inputText mailarea" v-model="mailarea" />
				</div>
				<!--下記は、入力内容の確認エリアです。-->
				<!--makesureの中身がtrueであれば、クラスdelateareaが付与されます。-->
				<!--{{mailarea}}がv-modelで上記のinputと連動しています。-->
				<!--{{mailarea}}にv-model="mailarea"で入力された箇所がリアルタイムで反映されます。-->
				<div v-bind:class="{ delatearea: makesure }">{{mailarea}}</div>
				<p class="erroebox">{{mailmiss}}</p>
			</dd>
		</dl>
		<!--以降、メールアドレスの時と同じように処理しています。-->
		<dl>
			<dt>お名前※</dt>
			<dd>
				<div v-bind:class="{ delatearea: inputdata }">
					<input type="text" name="namedata"  placeholder="例) 佐々木 太郎" class="inputText namearea" v-model="namearea" />
				</div>
				<div v-bind:class="{ delatearea: makesure }">{{namearea}}</div>
				<p class="erroebox">{{namemiss}}</p>
			</dd>
		</dl>
		<dl>
			<dt>備考</dt>
			<dd>
				<div v-bind:class="{ delatearea: inputdata }">
					<textarea name="textboxdata" class="textboxdata textboxarea" v-model="textboxarea"></textarea>
				</div>
				<div v-bind:class="{ delatearea: makesure }">
					{{textboxarea}}
				</div>
			</dd>
		</dl>
		
		<div v-bind:class="{ delatearea: inputdata }">
			<!--v-on:click="clickbtn"でmethodのclickbtnを起動させます。-->
			<button class="btnStyle1 submitarea" v-on:click="clickbtn">確認</button>
		</div>	
		<div v-bind:class="{ delatearea: makesure }">
			<!--v-on:click="clickbtn_back"でmethodのclickbtn_backを起動させます。-->
			<button class="btnStyle1 submitarea mgb10px" v-on:click="clickbtn_back">戻る</button>
			<!--v-on:click="clickbtn_send"でmethodのclickbtn_sendを起動させます。-->
			<button class="btnStyle1 submitarea" v-on:click="clickbtn_send">送信</button>
		</div>
		
	</div>
	

	<script>
		
		//下記の変数はエラーがあるとtrueに変わります。
		//どうやって変わるのかは以降の処理でご確認ください。
		//true = ミスがある false = ミスが無い
		//後半でエラーが無いか判断する時に使います。
		var mailerrorbox = "true";
		var nameerrorbox = "true";
		
		var formarea = new Vue({
			el: '#formarea',
			data: {
				//v-modelの値がリアルタイムで反映されます。
				mailarea: "",
				namearea: "",
				textboxarea: "",
				//下記は「入力フォーム」と「確認用文字列」の表示項目を切り替えます。
				//trueとなっている項目は消えます。
				//v-bind:classでclassをつけたり消したりできます。
				//display:none;が設定されたclass(今回はdelatearea)がついたり消えたりします。
				//trueになった方が消えるのは、delateareaがtrueで付与されるためです。
				inputdata:false,
				makesure:true
			},
			computed:{
				//dataの値に変化があると、computedが機能します。
				//入力内容にミスが無いか確認する「バリデーションチェック」を行います。
				mailmiss: function () {
					//変数maildataの中にdataのmailareaの値を入力します。
					let maildata = this.mailarea
					//冒頭のmailerrorboxがここで使われます。
					//まず、mailareaに変更があった時に値をtrueにリセット。
					//次の処理でエラーがなかった場合にfalseになります。
					mailerrorbox = "true";
					//以降、if文でエラーチェックをします。
					if(!maildata){
						//もし、maildataに何も入っていなかったら、下記のメッセージがmailmissに入ります。
						//mailmissは{{mailmiss}}で出力できます。
						return "メールが入ってないよ";
					}else if(maildata.match(/.+@.+\..+/)==null){
						//もし、maildataに入力された内容がメールアドレスじゃなければ、下記のメッセージ。
						//「/.+@.+\..+/」は正規表現と言われ、これでメールアドレスの形を確認しています。
						return "メールの形式間違ってるよ";
					}else{
						//もし、特にミスがなければ、falseになります。
						//確認項目がすべてfalseの場合にのみ、メールが送信されます。
						mailerrorbox = "false";
					};
				},
				//次は、名前のバリデーションチェックです。
				//名前は簡単で、未入力でなければfalseになります。
				//基本的にはメールチェックと同じです。
				namemiss: function () {
					//変数namedataの中にdataのmailareaの値を入力します。
					let namedata = this.namearea
					//エラー有無には冒頭で指定したnameerrorboxが使われています。
					nameerrorbox = "true";
					//以降、if文でエラーチェックをします。
					if(!namedata){
						//もし、namedataに何も入っていなかったら、下記のメッセージがnamemissに入ります。
						//namemissは{{namemiss}}で出力できます。
						return "名前が入ってないよ";
					}else{
						//もし、特にミスがなければ、falseになります。
						//確認項目がすべてfalseの場合にのみ、メールが送信されます。
						nameerrorbox = "false";
					}
				}
			},
			methods:{
				//methodで送信ボタンがクリックされた時の処理を書きます。
				//まず、確認ボタンが押された時からです。
				clickbtn: function () {
					//dataのinputdataにtrueを代入します。
					//するとhtmlのv-bind:classが指定された箇所でdelateareaが付与されます。
					this.inputdata = true
					//dataのmakesureにfalseを代入します。
					//するとhtmlのv-bind:classが指定された箇所でdelateareaが解除されます。
					this.makesure = false
					//上記だと、該当箇所の入力フォームが消えて、確認項目が表示されます。
				},
				//確認画面になった時、戻るボタンを押し、入力画面に戻る時の処理です。
				clickbtn_back: function () {
					this.inputdata = false
					this.makesure = true
					//上記だと、該当箇所の入力フォームが消えて、確認項目が表示されます。
				},
				//送信ボタンを押した時の処理です。
				clickbtn_send: function () {
					//mailerrorboxとnameerrorboxがそれぞれfalseであれば、エラー無しと判断。
					if(mailerrorbox == "false" && nameerrorbox == "false"){
						//axiosという機能を使ってPHPファイルにデータを送信します。
						//メールはPHPなどのバックエンド側の言語でしか送れません。
						//よって、Vue.jsからPHPにデータを渡す必要があります。
						//下記はデータをPHPに投げる時の1セットだと思ってください。
						let params = new URLSearchParams();
						//mailareaという箱の中にdata、mailareに入力された内容を入れます。
						params.append('mailarea', this.mailarea);
						//nameareaという箱の中にdata、nameareaに入力された内容を入れます。
						params.append('namearea', this.namearea);
						//textboxareaという箱の中にdata、textboxareaに入力された内容を入れます。
						params.append('textboxarea', this.textboxarea);
						//axiosという機能を使いデータを投げます。
						axios.post('functions/mail.php', params)
						//PHPで処理された結果がresponseに帰ってきます。
						.then(function (response) {
							//PHPで処理された結果はresponse.dataで呼び出せます。
							//今回は、送信完了メッセージが入っています。
							//詳しくはPHPファイルを確認してみてください。
							//alertで送信完了メッセージを出します。
							alert(response.data)
							//フォームのトップページにリダイレクトします。
							document.location = "./"
						})
						.catch(function (error) {
							//何かエラーが起きたらconsole.logにエラーを表示させます。
							console.log("error");
						})
					};
				}
			}
		})
		
	</script>
	
	
	
	
	
</body>
</html>