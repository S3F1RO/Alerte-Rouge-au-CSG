#include <unistd.h>
#include <stdlib.h>

int main(void) {
    setuid(0);
    setgid(0);

    execl("./startTrajectoryService.sh",  NULL);
    return 1;
}