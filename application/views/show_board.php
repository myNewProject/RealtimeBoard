<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	</style>
	<script src="/RealtimeBoard/static/js/jquery/1.11.2/jquery.js" type="text/javascript"></script>
	<script src="/RealtimeBoard/static/js/jquery.bpopup.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	
		function openMessage (IDS) {
			$('#'+IDS).bPopup();
//			$('#writeBody').bPopup();
		}

		function addBoard() {
			openMessage('writeBody');
		}

		function saveBoard() {
			if (!Trim($("#name").val())) {
				alert("이름을 입력해주세요.");
				$("#name").focus();
				return false;
			} else if (!Trim($("#title").val())) {
				alert("제목을 입력해주세요.");
				$("#title").focus();
				return false;
			} else if (!Trim($("#contents").val())) {
				alert("내용을 입력해주세요.");
				$("#contents").focus();
				return false;
			}

			$.ajax({
				type: 'POST',
				url: "index.php/board/write_ok",
				data: { name : Trim($("#name").val())
					, title : Trim($("#title").val())
					, contents : Trim($("#contents").val()) },
				cache: false,
				async: false
			}).done(function (html) {
				alert("저장되었습니다.");
			});

		}

		function Trim(str) { // Remove Blank Function 공백 제거 함수
			var index, len, bJudge

			while(true) {
				bJudge = true;
				index = str.indexOf(' ');
				if (index == -1) break;
				if (index == 0) {
					len = str.length;
					str = str.substring(0, index) + str.substring((index+1), len);
				} else {
					bJudge = false;
				}

				index = str.lastIndexOf(' ');
				if (index == -1) break;
				if (index == str.length - 1) {
					len = str.length;
					str = str.substring(0,index) + str.substring((index+1), len);
				} else {
					if (bJudge == false) {
						break;
					}
				}
			}

			return str;
		}
	</script>
</head>
<body>

<div id="container">
	<div id="body">
	</div>

	<div id="bottom">
		<div style="float:right; width=50%; text-align:right">
			<button onclick="javascript:addBoard();">글쓰기</button>
		</div>
	</div>

	<div id="writeBody" style="width:700px; height:500px; border:1px solid #333333; background-color:white; display:none">
		<div style="width:80% clear:both; height:30px; margin:0px auto; margin-top:20px">
			<span style="width:30% height:100%; line-height:30px">
				<b>이름</b>
			</span>
			<span style="width:70% height:100%; line-height:30px">
				<input type="text" name="name" id="name">
			</span>
		</div>
		<div style="width:80% clear:both; height:30px; margin:0px auto">
			<span style="width:30% height:100%; line-height:30px">
				<b>제목</b>
			</span>
			<span style="width:70% height:100%; line-height:30px">
				<input type="text" name="title" id="title" style="width:90%">
			</span>
		</div>
		<div style="width:80% clear:both; height:270px; margin:0px auto">
			<span style="width:30% height:100%; line-height:30px; vertical-align:top">
				<b>내용</b>
			</span>
			<span style="width:70% height:100%;">
				<textarea style="width:90%; height:100%" name="contents" id="contents"></textarea>
			</span>
		</div>
		<div style="width:80% clear:both; height:30px; margin:0px auto; margin-top:30px; text-align:center">
			<button onclick="javascript:saveBoard();">저장하기</button>
		</div>
	</div>
</div>


</body>
</html>