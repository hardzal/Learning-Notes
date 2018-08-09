#include<iostream>
#include<string>
#include<iomanip>
using namespace std;

int main() {
    int x, i, j, k;
    cin >> x;
    for(i = 0; i <= x; i++) {
        for(j = 0; j <= x; j++) {
            cout << j+i << "\t";
        }
        cout << "\n";
    }
    return 0;
}
