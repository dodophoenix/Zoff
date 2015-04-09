var list;
var toSend = "";
var sendURL;
var myScroll;
var scroller = false;
var showToggle =true;
var chan = $("#chan").html();
var hasadmin=0;

socket.on(guid, function(msg){
	populate_list(msg);
});

socket.on("abc", function(){
	alert("alert");
});

socket.on(chan.toLowerCase(), function(msg){
	populate_list(msg);
});

function populate_list(msg)
{
	console.log(msg);
	for(obj in msg)
	{
		console.log(msg[obj]);
	}
	/*list = msg[0];
	conf = list.conf;*/

	$("#wrapper").empty();

		$.each(msg, function(j, listeID){
			if(listeID.hasOwnProperty('startTime'))
			{
				console.log("startTime");
				if(listeID.hasOwnProperty("addsongs") && listeID.addsongs) adminadd = 1;
				else adminadd = 0;
				if(listeID.hasOwnProperty("allvideos") && listeID.allvideos) music = 1;
				else music = 0;
				if(listeID.hasOwnProperty("longsongs") && listeID.longsongs) longS = 1;
				else longS = 0;
				if(listeID.hasOwnProperty("vote") && listeID.vote) adminvote = 1;
				else adminvote = 0;
				if(listeID.hasOwnProperty("adminpass") && listeID.adminpass !== '') hasadmin = 1;
				else hasadmin = 0;
			}else if(!listeID.now_playing){
				var video_title=listeID.title.replace(/\\\'/g, "'").replace(/&quot;/g,"'").replace(/&amp;/g,"&");
				var video_id = listeID.id;
				if(find && $.inArray(video_id, bright) == -1) brightness = "brightness";
				else if(find && $.inArray(video_id, bright) != -1) brightness = "brightness fullbrightness";
				else brightness = "";
				var video_thumb = "http://i.ytimg.com/vi/"+video_id+"/mqdefault.jpg";
				var odd = ""; if(j%2===0)odd=" oddlist";
				var delsong = ""; if(pass_corr=="correct")delsong="<input id='del' title='Remove' type='button' class='button' value='X' onclick=\"vote('"+video_id+"','del')\">";
				var finalhtml="<div id='result' class='"+video_id+" result "+brightness+" lresult"+odd+"'>"+
				"<img class='thumb lthumb' src='"+video_thumb+"'>"+
				"<div class='ltitle'>"+video_title+"</div>"+
				"<div class='votes'>"+listeID.votes+
	                    "<a onclick=\"vote('"+video_id+"','pos');\" id='plus'>+</a>"+
	                    "<a onclick=\"vote('"+video_id+"','neg');\" id='minus'>-</a>"+
	                    delsong+
	                    "</div>"+
				"</div>";
				$("#wrapper").append(finalhtml);
			}
		});
		if($("#playlist").height() != $("#player").height() || (peis && $("#playlist").height() != $("#jplayer").height()))
		{
			if(!window.mobilecheck())
			{
				if(peis)
				{
					player_name = "#jplayer";
				}else player_name = "#player";
				$("#playlist").css({height: $(player_name).height()-$("#adminPanel").outerHeight(true)-$("#findform").outerHeight(true)+30});
				$("#playlist").css({overflow: "hidden"});
				if(scroller === false)
				{
					myScroll = new IScroll('#playlist', {
						mouseWheel: true,
						scrollbars: true,
						scrollY: true,
						interactiveScrollbars: true,
						fadeScrollbars: true
					});
					scroller = true;
				}else
				{
					myScroll.refresh();
				}
			}
		}
		if(window.mobilecheck())
		{
			//document.getElementById("player").style.display="none";
			//ytplayer.pauseVideo();
		}else{
			myScroll.refresh();
		}
		if(!adminTogg)
		{
			names=["vote","addsongs","longsongs","frontpage", "allvideos", "removeplay", "skip", "shuffle"];
			for (var i = 0; i < names.length; i++) {
				document.getElementsByName(names[i])[0].checked = (conf[names[i]] === "true");
				document.getElementsByName(names[i])[1].checked = (conf[names[i]] === "false");
			}
			
			if(hasadmin)
				$("#setpass").text("Channel has admin");
			else
				$("#setpass").text("Channel has no admin");
		}
		$("#settings").css("visibility", "visible");
		$("#settings").css("opacity", "0.7");
		$("#wrapper").css("opacity", "1");
}

function updateList()
{

}

function vote(id, vote){
	socket.emit('vote', [chan, id, vote, guid]);

	serverAns = ($.ajax({
		type: "GET",
		url: "php/change.php",
		async: false,
		data: "vote="+vote+"&id="+id+"&pass="+adminpass,
		success: function() {
			//console.log("voted "+vote+" on "+id);
			/*if(vote=="pos"){ $("#playlist").addClass("success");}
			else{ $("#playlist").addClass("fadeerror");}
			updateList();*/
		},
	}).responseText);

	if(serverAns == "wrong")
	{
		//alert("Wrong adminpassword!");
		$("#eBar").addClass("opacityFull");
	}else{
		if(vote=="pos" && serverAns != "many"){ $("."+id).addClass("success");}
		else{ $("."+id).addClass("fadeerror");}
		updateList();
	}

	setTimeout(function(){
		$("."+id).removeClass("success");
		$("."+id).removeClass("fadeerror");
		$("#eBar").removeClass("opacityFull");
	},1500);
}

function skip(){
	socket.emit('skip', [chan, guid]);
/*
	voteRes = ($.ajax({
		type: "GET",
		url: "php/change.php",
		async: false,
		data: "skip",
		success: function() {
			//console.log("voted to skip song");
			//$("#search").addClass("success");
			updateList();
		},
	}).responseText);

	if(voteRes == "wrong!")
	{
		document.getElementById("eBar").innerHTML = "Error: Skipping disabled.";
		$("#eBar").addClass("opacityFull");
	}else{
		skipVotes = voteRes.split("/");
		if(skipVotes[0]>= skipVotes[1]/2)
		{
			document.getElementById("sBar").innerHTML = "Successfully skipped!";
			$("#sBar").addClass("opacityFull");
		}else
		{
			document.getElementById("pBar").innerHTML = "Vote registrated! "+skipVotes[0]+" of "+skipVotes[1]+" has skipped. "+(Math.ceil(skipVotes[1]/2))+" or more is needed!";
			$("#pBar").addClass("opacityFull");
		}
	}
	setTimeout(function(){
		$("#search").removeClass("success");
		$("#sBar").removeClass("opacityFull");
		$("#pBar").removeClass("opacityFull");
		$("#eBar").removeClass("opacityFull");
	},1500);
*/
}

function show(){
	if(!window.mobilecheck())
	{
		if(showToggle){
	    	showToggle=false;
	    	$("#toptitle").empty();
	        $("#chan").addClass("bigChan");
	        //$("#chan").html("zoff.no/"+encodeURI(chan));
	        $("#chan").html("zoff.no/"+chan);
	    }else{
	    	showToggle=true;
	    	$("#toptitle").html("Zöff");
	    	$("#chan").removeClass("bigChan");
	    	$("#chan").html(chan);
	   }
	   fitToScreen();
	}
}


function ks()
{
	list = $.ajax({ type: "GET",   
		url: "php/change.php",   
		async: false
	}).responseText;
	list = $.parseJSON(list);
	myScroll.destroy();
	myScroll = null;
	$("#playlist").css({height: $("#player").height()});
	$("#playlist").css({overflow: "hidden"});
	myScroll = new IScroll('#playlist', {
		mouseWheel: true,
		scrollbars: false,
		scrollY: true,
		interactiveScrollbars: false
	});
	scroller = true; 
}