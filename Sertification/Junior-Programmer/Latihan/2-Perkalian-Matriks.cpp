#include<iostream>

using namespace std;
int main() {
    int x[2][2], y[2][2], r[2][2];
    int i, j, k;
    cout << "Perkalian Matriks\n";
    for(i = 0; i < 2; i++) {
        for(j = 0; j < 2; j++) {
            cout << "x[" << i+1 << ", " << j+1 << "] \t:";
            cin >> x[i][j];
            cout << "y[" << i+1 << ", " << j+1 << "] \t:";
            cin >> y[i][j];
        }
    }

    for(i = 0; i < 2; i++) {
        for(j = 0; j < 2; j++) {
            r[i][j] = 0;
            for(k = 0; k < 2; k++) {
                cout << "(" << x[i][k] << "x" << y[k][j] << ")";
                if(k<=0) cout << " + ";
                r[i][j] += (x[i][k]*y[k][j]);
            }
            cout << " = " << r[i][j] << "\n";   
        }
    }
    return 0;
}
