#!/bin/bash
length=50
echo -e "\n"
fill=1
echo $blank
message="Deleting McAfee"
for i in $(seq 1 $length);do 
    bar="$message : ["

    #Computing Values
    fill=$i
    blank=$(( $length-$fill )) 
    percent=$((i * 100 / length))
    
    # Display message based on percentage
    if (( $percent > 20  && $percent < 40 ));then
        message="Applying Anti-Virus"
    elif (( $percent > 40 && $percent < 60 ));then
        message="Reading Gospel     "
    elif (( $percent > 60 && $percent < 80 ));then
        message="Making coffee      "
    elif (( $percent > 80 && $percent < 100 ));then
        message="Removing Virus     "
    fi
    
    #Loops to add each elements into the bar
    
    #filled
    for (( f=0 ; f<=$fill ; f++ ));do
        bar+="#"
    done
    #blank
    for (( b=$blank ; b>0 ; b-- ));do
        bar+="-"
    done

    #Display
    bar+="] $percent%"
    echo $bar
    sleep 0.1
    clear
done

