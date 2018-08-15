#include<iostream>
#include<cmath>
using namespace std;

int main() {
	long long N;
	cin >> N;
	
	long long s = round(sqrt(N));
	
	if(s * s != N) {
		cout << "lampu mati" << endl;
	} else {
		cout << "lampu menyala" << endl;
	}
	return 0;
}
