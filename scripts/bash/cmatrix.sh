#!/bin/bash
cmatrix -u 2 &
CM_PID=$!
sleep $1
kill $CM_PID
