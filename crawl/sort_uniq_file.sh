# cp besttit.txt besttit.txt.backup && sort besttit.txt.backup | uniq > besttit.txt && cat besttit.txt
sed -i '/^$/d' $1
var=temp_file.txt
cp $1 $var && sort $var | uniq > $1 && cat $1
rm -rf $var

