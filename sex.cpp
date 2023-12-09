#include <iostream>
#include <iomanip>
#include <bits/stdc++.h>
#include <vector>
using namespace std;
int main(){
    int t;
    cin>>t;
    for (int i = 0; i < t; i++)
    {
        int x,y,k;
        cin>>x>>y>>k;
        int sum=0;
        if(y>x){
            sum+=x;
            if(y-x<=k){
                sum+=y-x;
                cout<<sum<<endl;
            }
            else{
                sum+=k;
                sum=sum+2*(y-sum);
                cout<<sum<<endl;
            }
            
        }
        else{
            cout<<x<<endl;
        }
    }
    

    return 0;
}