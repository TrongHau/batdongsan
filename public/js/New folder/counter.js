LoadTotalProductCount();var totalCount=0;var firstMin;var secondMin;var sumSec=0;var sec=0;var miliSec=0;var round=1;var roundDate;var timeEnd;var timeNext;var isLock=false;var isLockUpdate=false;var idxTime=0;function LoadTotalProductCount(){$.ajax({url:"/handlerweb/PostMoreInformation.ashx?func=LoadProductCount",dataType:"json",success:function(a){if(a!=null&&a.length>0){var b=new Date();sec=b.getSeconds();miliSec=b.getMilliseconds();totalCount=a[0].StartNo;firstMin=a[0].CountInMinutes;secondMin=a[1].CountInMinutes;roundDate=new Date(a[0].EndDate);timeEnd=a[0].EndDate;var c=miliSec>500?1:0;totalCount=firstMin[sec*2+c];$(".message strong").text(FormatDigits(totalCount));$(".message").show()}else{$(".message strong").text("10.000")}}})}function ResetProductCount(a){$.ajax({url:"/handlerweb/PostMoreInformation.ashx?func=LoadProductCount",dataType:"json",success:function(b){if(b!=null&&b.length>0){var d;if(b.length>1){d=new Date(b[1].EndDate)}else{d=new Date(b[0].EndDate)}var c;if(d.getMinutes()-roundDate.getMinutes()>=1){if(a!=1){firstMin=b[1].CountInMinutes}else{secondMin=b[1].CountInMinutes}timeNext=b[1].EndDate}}}})}function FormatDigits(a){return a.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g,"$1.")}$(document).ready(function(){setInterval(function(){var e=0;var a=new Date();sec=a.getSeconds();miliSec=a.getMilliseconds();try{var d=round==1?firstMin:secondMin;if(d!=null&&d.length>0){if(sec==59&&isLock){}else{e=miliSec>450?1:0;idxTime=sec*2+e;totalCount=d[idxTime];$(".message strong").text(FormatDigits(totalCount));var c=sec;if(sec==30&&!isLockUpdate){isLockUpdate=true;ResetProductCount(round)}if(sec==59&&!isLock){isLock=e==1?true:false;if(e==1){round=round==1?2:1;roundDate=data[round].EndDate}timeEnd=timeNext}if(sec>5&&sec<20){isLockUpdate=false;isLock=false}}}}catch(b){}},300)});